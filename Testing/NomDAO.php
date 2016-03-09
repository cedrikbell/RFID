<?php
interface NomDAO
{
    public function selectNomenclature($categoryName);
    public function insertNomenclature($nomName);
}