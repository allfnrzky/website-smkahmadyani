<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;

    public function __construct($otp) {
        $this->otp = $otp;
    }

    public function build() {
        return $this->subject('Token Verifikasi Registrasi PPDB')
                    ->html("<h3>Token Anda adalah: <b>{$this->otp}</b></h3><p>Masukkan kode ini untuk melanjutkan registrasi.</p>");
    }
}