<?php

namespace Ahmed\Maher;

class db
{

  private $coon;
  private $sql;

  public function __construct($data)
  {
    $this->coon = new \mysqli($data[0], $data[1], $data[2], $data[3]);
  }

  public function select($table, $column = "*")
  {
    $this->sql = "SELECT $column FROM `$table` ";
    return $this;
  }

  public function delete($table)
  {
    $this->sql = "DELETE FROM `$table` ";
    return $this;
  }

  public function insert($table, $data)
  {
    $column = "";
    $values = "";
    foreach ($data as $key => $value) {
      $column .= "`$key`,";
      $values .= "'$value',";
    }

    $column = rtrim($column, ",");
    $values = rtrim($values, ",");

    $this->sql = "INSERT INTO `$table` ($column) VALUES ($values)";
    return $this;
  }

  public function update($table, $data)
  {
    $row = "";
    foreach ($data as $key => $value) {
      $row = "`$key` = $value ,";
    }

    $row = rtrim($row, ",");
    $this->sql = "UPDATE `$table` SET  $row ";
    return $this;
  }

  public function where($column, $operator, $value)
  {
    $this->sql .= " WHERE `$column` $operator '$value' ";
    return $this;
  }

  public function andWhere($column, $operator, $value)
  {
    $this->sql .= " AND `$column` $operator '$value' ";
    return $this;
  }

  public function join($type, $table, $primary, $foreign)
  {
    $this->sql .= " $type join `$table` ON $primary = $foreign";
    return $this;
  }

  public function rows()
  {
    $query = $this->coon->query($this->sql);
    return $query->fetch_all(MYSQLI_ASSOC);
  }

  public function first()
  {
    $query = $this->coon->query($this->sql);
    return $query->fetch_assoc();
  }

  public function execute()
  {
    $this->coon->query($this->sql);
    return $this->coon->affected_rows;
  }

  public function shwoError()
  {
    return mysqli_error_list($this->coon);
  }

  public function __destruct()
  {
    $this->coon->close();
  }
}

?>
