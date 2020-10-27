<?php
declare(strict_types=1);

namespace Cundd\Rest\Tests\Functional\Integration;

use TYPO3\CMS\Core\Information\Typo3Version;
use function class_exists;

trait ImportPagesTrait
{
    public function importPages()
    {
        if (class_exists(Typo3Version::class) && (new Typo3Version())->getMajorVersion() >= 10) {
            $this->importDataSet(__DIR__ . '/../Fixtures/pages-modern-typo3.xml');
        } else {
            $this->importDataSet('ntf://Database/pages.xml');
            $this->importDataSet('ntf://Database/pages_language_overlay.xml');
        }
    }
}