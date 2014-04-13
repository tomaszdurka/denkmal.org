<?php

class Denkmal_Paging_Song_Search extends Denkmal_Paging_Song_Abstract {

    /**
     * @param string|string[] $term
     */
    public function __construct($term) {
        $term = (array) $term;

        $whereList = array_fill(0, count($term), 'LOWER(`label`) LIKE ?');
        $where = implode(' AND ', $whereList);

        $params = Functional\map($term, function ($value) {
            return '%' . strtolower($value) . '%';
        });

        $source = new CM_PagingSource_Sql('id', 'denkmal_model_song', $where, '`label`', null, null, $params);
        parent::__construct($source);
    }
}
