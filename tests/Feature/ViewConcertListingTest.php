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
        $this->withoutExceptionHandling();

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
        $view = $this->get('/concerts/'.$concert->id);

        // Assert
        // see the concert details
        $view->assertSee('Sample Title');
        $view->assertSee('Sample Subtitle');
        $view->assertSee('December 13, 2016');
        $view->assertSee('8:00pm');
        $view->assertSee('32.50');
        $view->assertSee('Sample Venue',);
        $view->assertSee('123 Sample Address');
        $view->assertSee('Some City, ON 12345');
        $view->assertSee('For tickets, call (555) 555-5555.');
    }
}
