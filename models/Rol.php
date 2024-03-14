<?php
 class Rol extends Conectar {
    /* Listar Registros */
    public function get_rol_x_suc_id($suc_id) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_L_ROL_01(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    /* Listar Registro por ID en especifico */
    public function get_rol_x_rol_id($rol_id) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_L_ROL_02(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $rol_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    /* Eliminar o cambiar estado a eliminado */
    public function delete_rol($rol_id) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_D_ROL_01(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $rol_id);
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /* Registro de datos */
    public function insert_rol($suc_id, $rol_nom) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_I_ROL_01(?,?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $suc_id);
            $query->bindValue(2, $rol_nom);
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /* Actualizar Datos */
    public function update_rol($rol_id, $suc_id, $rol_nom) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_U_ROL_01(?,?,?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $rol_id);
            $query->bindValue(2, $suc_id);
            $query->bindValue(3, $rol_nom);
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /* Validar acceso ROL */
    public function validar_acceso_rol($usu_id, $men_identi) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_L_MENU_03(?,?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $usu_id);
            $query->bindValue(2, $men_identi);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
}

?>