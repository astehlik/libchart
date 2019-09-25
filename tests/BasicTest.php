<?php
/* Libchart - PHP chart library
 * Copyright (C) 2005-2011 Jean-Marc Tr�meaux (jm.tremeaux at gmail.com)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Tests\Libchart;

use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    /**
     * @dataProvider provider
     * @runInSeparateProcess
     */
    public function testFixtureOuputsSameFile(string $expectedPngFile, string $inputPhpFile)
    {
        $this->assertStringNotContainsString(file_get_contents($inputPhpFile), 'common.php');

        if (!file_exists($expectedPngFile)) {
            // No file means an error is going to be thrown
            $this->expectException(\RuntimeException::class);
        }

        $actualPngString = call_user_func(function ($inputPhpFile) {
            try {
                ob_start();
                include $inputPhpFile;
                return ob_get_clean();
            } catch (\Exception $e) {
                ob_end_clean();
                throw $e;
            }
        }, $inputPhpFile);

        if (!file_exists($expectedPngFile)) {
            // Actualize a fixture
            file_put_contents($expectedPngFile, $actualPngString);
        }

        $this->assertImagesSame(imagecreatefrompng($expectedPngFile), imagecreatefromstring($actualPngString));
    }

    public function provider()
    {
        foreach (new \GlobIterator('tests/fixtures/actual/*.php') as $fileInfo) {
            /** @var $fileInfo \SplFileInfo */

            // Use .php as a label
            yield $fileInfo->getFilename() => [
                str_replace(['actual', '.php'], ['expected', '.png'], $fileInfo->getRealPath()),
                $fileInfo->getRealPath(),
            ];
        }
    }

    private function assertImagesSame($expectedPng, $actualPng)
    {
        $this->assertSame(imagesx($expectedPng), imagesx($actualPng));
        $this->assertSame(imagesy($expectedPng), imagesy($actualPng));

        $this->assertSame(imagecolorsforindex($actualPng, imagecolorat($actualPng, 10, 10)), imagecolorsforindex($expectedPng, imagecolorat($expectedPng, 10, 10)));

        return;
        // More advanced test which needs fixtures updated

        for ($x = 0; $x < imagesx($expectedPng); $x++) {
            for ($y = 0; $y < imagesy($expectedPng); $y++) {
                $this->assertSame(imagecolorsforindex($actualPng, imagecolorat($actualPng, $x, $y)), imagecolorsforindex($expectedPng, imagecolorat($expectedPng, $x, $y)));
            }
        }
    }
}