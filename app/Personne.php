<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Personne extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Personne";

    protected $fillable = [
        'identifiant', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isEtudiant() {
        return $this->code_etudiant != null;
    }
    public function isEnseignant() {
        return $this->code_professeur != null;
    }

    public function isAdmin() {
        return $this->admin == 1;
    }


    public function getPath() {
        return $this->isEtudiant() ? "/etudiant" : "/enseignant";
    }

}