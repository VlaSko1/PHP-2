<?php

namespace app\models;
use app\interfaces\IModel;
use app\engine\App;

abstract class Repository implements IModel
{
    public function getOneWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:value";
        return App::call()->db->queryObject($sql, ["value"=>$value], $this->getEntityClass());
    }

    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT sum(count_product) as count FROM {$tableName} WHERE `$field`=:value";
        return App::call()->db->queryOne($sql, ["value" => $value])['count'];
    }

    public function showLimit($page) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE 1 LIMIT ?";
        return App::call()->db->executeLimit($sql, $page) ;
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return App::call()->db->queryObject($sql, ['id' => $id], $this->getEntityClass());
    }
    public function getOneByProdId($product_id, $session_id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE product_id = :product_id AND session_id = :session_id";
        return App::call()->db->queryObject($sql, ['product_id' => $product_id, 'session_id' => $session_id], $this->getEntityClass());
    }

    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return App::call()->db->queryAll($sql);
    }

    public function insert(Model $entity) {
        $params = [];
        $columns = [];
        foreach ($entity->props as $key => $value) {
            //if ($value == false) continue;

            $params[":{$key}"] = $entity->$key;
            $columns[] = "`{$key}`";
            //$entity->props[$key] = false;
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $tableName = $this->getTableName();

        $sql = "INSERT INTO `{$tableName}` ({$columns}) VALUES ({$values})";

        App::call()->db->execute($sql, $params);

        $entity->id = App::call()->db->lastInsertId();
    }

    public function update(Model $entity) {
        $params = [];
        $columns = [];
        foreach ($entity->props as $key => $value) {
            if ($value == false) continue;

            $params[":{$key}"] = $entity->$key;
            $columns[] = "`{$key}`=:{$key}";
            $entity->props[$key] = false;
        }
        $params[':id'] = (int) $entity->id;
        $columns = implode(", ", $columns);
        $tableName = $this->getTableName();

        $sql = "UPDATE `{$tableName}` SET {$columns} WHERE id=:id";
        App::call()->db->execute($sql, $params);

    }

    public function save(Model $entity) {
        if(is_null($entity->id))
            $this->insert($entity);
        else
            $this->update($entity);
    }

    public function delete(Model $entity) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return App::call()->db->execute($sql, ['id'=> $entity->id]);
    }

}