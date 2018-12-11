<?php

class ReportController
{
    /**
     * Initialize the library in your constructor using
     * your environment, api key, and password
     */
    public function __construct()
    {
        $environment = 'sandbox'; // or 'production'
        \davecoffin\Bluesnap\Bluesnap::init($environment, 'YOUR_API_KEY', 'YOUR_API_PASSWORD');
    }

    /**
     * Get a Report
     *
     * @return \davecoffin\Bluesnap\Models\Report
     */
    public function getReport()
    {
        // pass query parameters as array
        $response = \davecoffin\Bluesnap\Report::get('TransactionDetail', [
            'period' => 'THIS_MONTH'
        ]);

        if ($response->failed()) {
            $error = $response->data;

            // handle error
        }

        $report = $response->data;

        return $report;
    }
}