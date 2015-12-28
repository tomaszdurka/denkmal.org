<?php

class Denkmal_Scraper_Source_ProgrammzeitungTest extends CMTest_TestCase {

    public function testProcessPageDate() {
        $html = Denkmal_Scraper_Source_Abstract::loadFile(DIR_TEST_DATA . 'scraper/programmzeitung.html');
        $scraper = new Denkmal_Scraper_Source_Programmzeitung();

        $eventDataList = $scraper->processPageDate($html, new DateTime('2016-01-04'));

        $this->assertCount(3, $eventDataList);

        $this->assertEquals(new Denkmal_Scraper_EventData(
            'Restaurant Alter Zoll',
            new Denkmal_Scraper_Description('Eröffnungsband: Stephan Plecher (p), Marc Mezgolits (b), Michael Heidepriem (dr). Reservationen (T 061 322 46 26, info@alterzoll.ch)', 'Monday Jazz - Jazzer-Stammtisch & Jamsession'),
            new DateTime('2016-01-04 19:00:00')
        ), $eventDataList[0]);

        $this->assertEquals(new Denkmal_Scraper_EventData(
            '8-Bar',
            new Denkmal_Scraper_Description('Singer-Songwriterin. www.8-bar.eu', 'Sofie Ellenbroek'),
            new DateTime('2016-01-04 20:30:00')
        ), $eventDataList[1]);

        $this->assertEquals(new Denkmal_Scraper_EventData(
            'Tango Schule Basel',
            new Denkmal_Scraper_Description('Übungsabend mit Schnupperstunde', 'Tango'),
            new DateTime('2016-01-04 20:00:00'),
            new DateTime('2016-01-04 22:30:00')
        ), $eventDataList[2]);
    }
}
