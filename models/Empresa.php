<?php
   class Empresa extends Conectar {
    /* Listar Registros */
    public function get_empresa_x_com_id($com_id) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_L_EMPRESA_01(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $com_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    /* Listar Registro por ID en especifico */
    public function get_empresa_x_emp_id($emp_id) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_L_EMPRESA_02(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    /* Eliminar o cambiar estado a eliminado */
    public function delete_empresa($emp_id) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_D_EMPRESA_01(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /* Registro de datos */
    public function insert_empresa($com_id, $emp_nom, $emp_ruc) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_I_EMPRESA_01(?,?,?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $com_id);
            $query->bindValue(2, $emp_nom);
            $query->bindValue(3, $emp_ruc);
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /* Actualizar Datos */
    public function update_empresa($emp_id, $com_id, $emp_nom, $emp_ruc) {
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_U_EMPRESA_01(?,?,?,?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $emp_id);
            $query->bindValue(2, $com_id);
            $query->bindValue(3, $emp_nom);
            $query->bindValue(4, $emp_ruc);
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>
