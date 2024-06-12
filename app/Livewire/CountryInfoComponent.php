<?php

namespace App\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;

class CountryInfoComponent extends Component
{
    protected $countryInfo = null;

    public function mount()
    {
        $this->fetchCountryInfo();
    }

    private function fetchCountryInfo()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.countrystatecity.in/v1/countries/IN', [
            'headers' => [
                'Authorization' => 'Bearer YOUR_API_KEY_HERE', // Replace 'YOUR_API_KEY_HERE' with your actual API key
            ],
        ]);

        $this->countryInfo = json_decode($response->getBody()->getContents(), true);
    }

    public function render()
    {
        return view('livewire.components.country-info-component', ['countryInfo' => $this->countryInfo]);
    }
}