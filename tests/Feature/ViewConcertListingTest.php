<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewConcertListingTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function user_can_view_a_concert_listing()
    {
        // Arrange
        // Create a concert
        $concert = Concert::create([
            'title' => 'Sample Title',
            'subtitle' => 'Sample Subtitle',
            'date' => Carbon::parse('December 13, 2016 8:00pm'),
            'ticket_price' => 3250,
            'venue' => 'Sample Venue',
            'venue_address' => '123 Sample Address',
            'city' => 'Some City',
            'state' => 'ON',
            'zip' => '12345',
            'additional_information' => 'For tickets, call (555) 555-5555.'
        ]);

        // Act
        // View the concert listing
        $this->visit('/concerts/'.$concert->id);

        // Assert
        // see the concert details
        $this->see('Sample Title');
        $this->see('Sample Subtitle');
        $this->see('December 13, 2016');
        $this->see('8:00pm');
        $this->see('32.50');
        $this->see('Sample Venue',);
        $this->see('123 Sample Address');
        $this->see('Some City, ON 12345');
        $this->see('For tickets, call (555) 555-5555.');
    }
}
