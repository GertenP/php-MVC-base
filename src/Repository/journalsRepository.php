<?php

namespace App\Repository;

use App\Models\Journal;
use PDO;

class journalsRepository
{

    public $test_conn;

    function __construct()
    {
        global $test_conn;
        $this->test_conn = $test_conn;
    }

    function getAll()
    {
        $stmt = $this->test_conn->query("SELECT * FROM journals");
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        $journals = [];
        foreach ($rows as $row) {
            $journals[] = new Journal($row->id, $row->name, $row->date);
        }

        return $journals;
    }

    function add($journal)
    {
        $stmt = $this->test_conn->prepare("INSERT INTO journals (name, date) VALUES (':name', ':date')");
        $stmt->execute([':name' => $journal->name, ':date' => $journal->date]);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    function get($id)
    {
        $stmt = $this->test_conn->prepare("SELECT * FROM journals WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    function save($journal)
    {
        $stmt = $this->test_conn->prepare("UPDATE journals SET name = :name, date = :date WHERE id = :id");
        $stmt->execute([':id' => $journal->id, ':name' => $journal->name, ':date' => $journal->date]);
    }

    function delete($id)
    {
        $stmt = $this->test_conn->prepare("DELETE FROM journals WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
