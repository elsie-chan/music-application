<?php
use App\Model\Model;
class AlbumModel extends Model
{
    protected $table = 'album';

    public function __construct()
    {
        parent::__construct();
    }
}