<?php
use Cme\BulletinParser;
use Cme\Report\ReportDb;

require 'vendor/autoload.php';
require 'database.php';

const DS = DIRECTORY_SEPARATOR;

$ignore = \Cme\Eloquent\Strike::select('bulletin_date')
    ->distinct()
    ->orderBy('bulletin_date', 'asc')
    ->lists('bulletin_date');

$path = __DIR__ . DS . 'data2';

$parser = new BulletinParser();
$parser->setReport(new ReportDb());
$parser->setIgnoreDate($ignore);

if ($reports = scandir($path)) {
    foreach ($reports as $report) {
        $report = $path . DS . $report;
        if (is_file($report)) {
            echo 'Parse: ' . $report . PHP_EOL;
            $parser->parse($report);
        }
    }
}
