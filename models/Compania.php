<?php
class Compania extends Conectar {
    /* Listar Registros */
    public function get_compania() {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_L_COMPANIA_01()";
            $query = $conectar->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    /* Listar Registro por ID en especifico */
    public function get_compania_x_com_id($com_id) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_L_COMPANIA_02(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $com_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    /* Eliminar o cambiar estado a eliminado */
    public function delete_compania($com_id) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_D_COMPANIA_01(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $com_id);
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /* Registro de datos */
    public function insert_compania($com_nom) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_I_COMPANIA_01(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $com_nom);
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /* Actualizar Datos */
    public function update_compania($com_id, $com_nom) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_U_COMPANIA_01(?,?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $com_id);
            $query->bindValue(2, $com_nom);
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>