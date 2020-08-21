<?php
namespace App\Services\Cliente;

use App\Repositories\TokenLinkRepository;
use App\Services\BaseService;
use Hashids\Hashids;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class TokenLinkService extends BaseService{

    public function __construct(TokenLinkRepository $repo)
    {
        $this->repo = $repo;
    }
    public  function invalidateTokenLink($token){
        return $this->update($token,[
            'used' => true
        ]);
    }
    public function validateTokenLink($token)
    {

        $tokenLink = $this->findByToken($token);

        return $tokenLink != null and
               !$tokenLink->used and
               $tokenLink->expires_at >= now() ;
    }

    public function findByToken($token)
    {
        return $this->repo->findByToken($token);
    }
    public function generateLink($userId){
        Db::beginTransaction();
            $expireTime = now()->addHour();
            $hashId = new Hashids(Str::orderedUuid());
            $tokenLink = $this->create([
                'cliente_id' => $userId,
                'token' => $hashId->encode($expireTime->timestamp),
                'expires_at' => $expireTime,
                'used' => false
            ]);
            $link = URL::route('agendar',['code'=> $tokenLink->token]);
        Db::commit();
        return $link;
    }
}