<?php
 
namespace App\Mail;
use Illuminate\Mail\Mailable; 
use Illuminate\Bus\Queueable;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class FranchiseeRegistration extends Mailable
{
    use Queueable, SerializesModels;
     
    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $demo;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('brainobrain@swachhsite.com')
                    ->subject('Brainobrain Assessment: Franchisee Registration')
                    ->view('mails.franchisee_registration')
                    
                    ->with(
                      [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                      ])
                     // ->attach(public_path('/images').'/demo.jpg', [
                     //         'as' => 'demo.jpg',
                     //         'mime' => 'image/jpeg',
                     // ])
                      ;
    }
}
