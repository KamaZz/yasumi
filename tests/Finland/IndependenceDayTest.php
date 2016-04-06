<?php
/**
 *  This file is part of the Yasumi package.
 *
 *  Copyright (c) 2015 - 2016 AzuyaLabs
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author Sacha Telgenhof <stelgenhof@gmail.com>
 */

namespace Yasumi\Tests\Finland;

use DateTime;
use DateTimeZone;

/**
 * Class for testing the Independence Day of Finland in Finland.
 */
class NationalDayTest extends FinlandBaseTestCase
{
    /**
     * The year in which the holiday was first established
     */
    const ESTABLISHMENT_YEAR = 1917;

    /**
     * The name of the holiday
     */
    const HOLIDAY = 'independenceDay';

    /**
     * Tests the holiday defined in this test on or after establishment.
     */
    public function testHolidayOnAfterEstablishment()
    {
        $year = 2018;
        $this->assertHoliday(self::REGION, self::HOLIDAY, $year,
            new DateTime("$year-12-6", new DateTimeZone(self::TIMEZONE)));
    }

    /**
     * Tests the holiday defined in this test before establishment.
     */
    public function testHolidayBeforeEstablishment()
    {
        $this->assertNotHoliday(self::REGION, self::HOLIDAY,
            $this->generateRandomYear(1000, self::ESTABLISHMENT_YEAR - 1));
    }

    /**
     * Tests the translated name of the holiday defined in this test on or after establishment.
     */
    public function testTranslationOnAfterEstablishment()
    {
        $this->assertTranslatedHolidayName(self::REGION, self::HOLIDAY,
            $this->generateRandomYear(self::ESTABLISHMENT_YEAR), [self::LOCALE => 'Itsenäisyyspäivä']);
    }
}