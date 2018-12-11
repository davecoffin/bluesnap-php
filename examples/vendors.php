<?php

class VendorController
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
     * Create a Vendor
     *
     * @return \davecoffin\Bluesnap\Models\Vendor
     */
    public function createVendor()
    {
        $response = \davecoffin\Bluesnap\Vendor::create([
            'email' => 'vendoremail@example.com',
            'country' => 'US'
        ]);

        if ($response->failed()) {
            $error = $response->data;

            // handle error
        }

        $vendor = $response->data;

        return $transaction;
    }

    /**
     * Get a Vendor
     *
     * @param int $vendor_id
     * @return \davecoffin\Bluesnap\Models\Vendor
     */
    public function getVendor($vendor_id)
    {
        $response = \davecoffin\Bluesnap\Vendor::get($vendor_id);

        if ($response->failed()) {
            $error = $response->data;

            // handle error
        }

        $vendor = $response->data;

        return $vendor;
    }

    /**
     * Get All Vendors
     *
     * @return \davecoffin\Bluesnap\Models\Vendor[]
     */
    public function getAllVendors()
    {
        $response = \davecoffin\Bluesnap\Vendor::get();

        $vendors = $response->data;

        return $vendors;
    }
}
