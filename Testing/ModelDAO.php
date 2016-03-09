<?php
interface ModelDAO
{
    public function selectModel($inModel);
    public function insertsModel($inModel,$inMake,$inCategory);
    public function selectNomenclature($inCategory);
    public function selectMake($inMake);
}