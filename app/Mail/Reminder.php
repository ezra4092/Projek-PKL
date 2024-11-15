<?php

namespace App\Mail;

use App\Models\Sertifikat;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reminder extends Mailable
{
    use Queueable, SerializesModels;

    public $sertifikat;

    /**
     * Create a new message instance.
     *
     * @param Sertifikat $sertifikat
     */
    public function __construct(Sertifikat $sertifikat)
    {
        $this->sertifikat = $sertifikat;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reminder: Sertifikat ISO Anda Akan Segera Kedaluwarsa')
                    ->view('konten.mail'); // Pastikan Anda membuat view ini
    }
}
