<?php
namespace App\Models\Psicologo;
use App\Facades\GoogleCalendar;
use Google_Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property string $refresh_token
 * @property string $access_token
 * @property array $scope
 * @property array $check_calendars
 * @property Carbon $expires_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read bool $expired
 * @property-read Carbon $expires_in
 * @property-read Psicologo $user
 */
class GoogleAuth extends Model
{
    protected $fillable = [
        'access_token',
        'refresh_token',
        'expires_at',
        'psicologo_id',
        'scope',
        'check_calendars',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'expires_at',
    ];

    protected $casts = [
        'scope' => 'array',
        'check_calendars' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (GoogleAuth $google) {
            $google->revokeToken();
        });
    }

    public function user()
    {
        return $this->belongsTo(Psicologo::class);
    }

    public function getExpiresInAttribute(): int
    {
        return $this->expires_at->timestamp - now()->timestamp;
    }

    public function getExpiredAttribute(): bool
    {
        return $this->expires_in <= 30;
    }

    public function getAccessTokenAttribute()
    {
        if ($this->expired) {
            $this->refreshToken();
        }

        return $this->attributes['access_token'];
    }

    public function refreshToken()
    {
        $token = GoogleCalendar::refreshToken($this);
        if (isset($token['error'])) return;
        $expiresAt = Carbon::now()->addSeconds($token['expires_in']);
        $this->refresh_token = $token['refresh_token'];
        $this->access_token = $token['access_token'];
        $this->expires_at = $expiresAt;
        $this->save();
    }

    public function revokeToken()
    {
        return $this->getClient()->revokeToken();
    }

    public function getClient(): Google_Client
    {
        $client = new Google_Client();
        $client->setAuthConfig(config('integrations.google'));
        $client->setRedirectUri(config('integrations.google.redirect_uri'));

        if ($this->attributes['access_token']) {
            $client->setAccessToken($this->attributes['access_token']);
        }

        return $client;
    }

    public function fillCredentials(array $credential): self
    {
        $this->fill([
            'scope' => $credential['scope'],
            'expires_at' => $credential['created'] + $credential['expires_in'],
            'access_token' => $credential['access_token'],
            'refresh_token' => $credential['refresh_token'],
        ]);

        return $this;
    }
}
