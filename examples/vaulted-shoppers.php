<?php

class VaultedShopperController
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
     * Create a VaultedShopper
     *
     * @return \davecoffin\Bluesnap\Models\VaultedShopper
     */
    public function createVaultedShopper()
    {
        $response = \davecoffin\Bluesnap\VaultedShopper::create([
            'firstName' => 'John',
            'lastName' => 'Smith',
        ]);

        if ($response->failed())
        {
            $error = $response->data;

            //  handle error
        }

        $vaulted_shopper = $response->data;

        return $vaulted_shopper;
    }

    /**
     * Get a VaultedShopper
     *
     * @param int $vaulted_shopper_id
     * @return \davecoffin\Bluesnap\Models\VaultedShopper
     */
    public function getVaultedShopper($vaulted_shopper_id)
    {
        $response = \davecoffin\Bluesnap\VaultedShopper::get($vaulted_shopper_id);

        if ($response->failed()) {
            $error = $response->data;

            // handle error
        }

        $vaulted_shopper = $response->data;

        return $vaulted_shopper;
    }

    /**
     * Get all VaultedShoppers
     *
     * @return \davecoffin\Bluesnap\Models\VaultedShopper[]
     */
    public function getAllVaultedShoppers()
    {
        $response = \davecoffin\Bluesnap\VaultedShopper::get();

        $vaulted_shoppers = $response->data;

        return $vaulted_shoppers;
    }

    /**
     * Add a New Card to a VaultedShopper
     *
     * @param int $vaulted_shopper_id
     * @return \davecoffin\Bluesnap\Models\VaultedShopper
     */
    public function addCardToVaultedShopper($vaulted_shopper_id)
    {
        $vaulted_shopper = $this->getVaultedShopper($vaulted_shopper_id);

        $vaulted_shopper->paymentSources = [
            'creditCardInfo' => [
                [
                    'billingContactInfo' => [
                        'firstName' => 'John',
                        'lastName' => 'Smith',
                    ],
                    'creditCard' => [
                        'cardNumber' => '4263982640269299',
                        'expirationMonth' => '02',
                        'expirationYear' => '2018',
                        'securityCode' => '837'
                    ]
                ]
            ]
        ];

        $response = \davecoffin\Bluesnap\VaultedShopper::update($vaulted_shopper_id, $vaulted_shopper);

        if ($response->failed()) {
            $error = $response->data;

            // handle error
        }

        $vaulted_shopper = $response->data;

        return $vaulted_shopper;
    }
}