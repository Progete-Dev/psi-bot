<?php


namespace App\Models\Psicologo;


trait UsesGoogleCalendar
{
    public function googleAuth()
    {
        return $this-> hasOne(GoogleAuth::class);
    }
}