<?php
class Sucursal extends Conectar{
    /* Listar Registros */
    public function get_sucursal_x_emp_id($emp_id){
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_L_SUCURSAL_01(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $emp_id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar la excepción aquí, por ejemplo, registrarla o mostrar un mensaje de error
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    /* Listar Registro por ID en especifico */
    public function get_sucursal_x_suc_id($suc_id){
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_L_SUCURSAL_02(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $suc_id, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar la excepción aquí, por ejemplo, registrarla o mostrar un mensaje de error
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    /* Eliminar o cambiar estado a eliminado */
    public function delete_sucursal($suc_id){
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_D_SUCURSAL_01(?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $suc_id, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            // Manejar la excepción aquí, por ejemplo, registrarla o mostrar un mensaje de error
            echo "Error: " . $e->getMessage();
        }
    }

    /* Registro de datos */
    public function insert_sucursal($emp_id, $suc_nom){
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_I_SUCURSAL_01(?, ?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $emp_id, PDO::PARAM_INT);
            $query->bindValue(2, $suc_nom, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
            // Manejar la excepción aquí, por ejemplo, registrarla o mostrar un mensaje de error
            echo "Error: " . $e->getMessage();
        }
    }

    /* Actualizar Datos */
    public function update_sucursal($suc_id, $emp_id, $suc_nom){
        try {
            $conectar = parent::Conexion();
            $sql = "CALL SP_U_SUCURSAL_01(?, ?, ?)";
            $query = $conectar->prepare($sql);
            $query->bindValue(1, $suc_id, PDO::PARAM_INT);
            $query->bindValue(2, $emp_id, PDO::PARAM_INT);
            $query->bindValue(3, $suc_nom, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
            // Manejar la excepción aquí, por ejemplo, registrarla o mostrar un mensaje de error
            echo "Error: " . $e->getMessage();
        }
    }
}
?>