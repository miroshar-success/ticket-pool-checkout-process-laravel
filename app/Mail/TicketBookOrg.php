<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketBookOrg extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$detail,$subject)
    {
        $this->content = $content;
        $this->detail = $detail;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->replaceContent();
        
        return $this->from($address = env('MAIL_FROM_ADDRESS'), $name = $this->detail['app_name'])
            ->subject($this->subject)->view('admin/mailMessage')
            ->with([
            'content' => $this->content,           
        ]); 
    }
     
    public function replaceContent() {
        $data = ["{{organizer_name}}","{{user_name}}", "{{quantity}}","{{event_name}}","{{date}}","{{app_name}}"];   
        $this->content = str_replace($data, $this->detail, $this->content);
    }
}
