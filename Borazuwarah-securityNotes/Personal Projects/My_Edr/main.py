import psutil
import mysql.connector
from mysql.connector import Error
import time


# Importar configuración de la base de datos
from db_configuration import DB_CONFIG  

# Configuración de la conexión a MySQL
def create_connection():
    try:
        connection = mysql.connector.connect(
            host=DB_CONFIG['host'],
            user=DB_CONFIG['user'],
            password=DB_CONFIG['password'],
            database=DB_CONFIG['database']
        )
        if connection.is_connected():
            print("Conexión a MySQL establecida.")
            return connection
    except Error as e:
        print(f"Error al conectar a MySQL: {e}")
        return None

# Conectar a la base de datos
conn = create_connection()
cursor = conn.cursor()


def store_process_info():
    print("Almacenando Información de Procesos...")
    seen_processes = set()  # Para almacenar nombres de procesos ya vistos
    process_data = []  # Lista para acumular los datos de procesos

    # Obtener la información del uso de CPU del sistema
    psutil.cpu_percent(interval=1)  # Hacer una medición general para obtener una base de datos precisa

    for process in psutil.process_iter(['pid', 'name', 'status', 'cpu_percent', 'memory_percent']):
        process_name = process.info['name']

        # Mostrar solo si el nombre del proceso no ha sido visto antes
        if process_name not in seen_processes:
            try:
                # Obtener el uso de CPU del proceso específico
                cpu_usage = process.cpu_percent(interval=0.1)  # Intervalo corto para obtener una lectura rápida
                memory_usage = f"{process.info['memory_percent']:.2f}"  # Formatear el uso de memoria
                timestamp = time.strftime('%Y-%m-%d %H:%M:%S')  # Formato de timestamp para MySQL

                # Preparar los valores para la inserción
                process_data.append((timestamp, process.info['pid'], process_name, process.info['status'], cpu_usage, memory_usage))
                seen_processes.add(process_name)
            except (psutil.NoSuchProcess, psutil.AccessDenied) as e:
                print(f"Error al procesar {process_name}: {e}")

    # Inserción masiva en la base de datos
    if process_data:
        query = '''
        INSERT INTO processes (timestamp, pid, name, status, cpu_usage, memory_usage)
        VALUES (%s, %s, %s, %s, %s, %s)
        '''
        cursor.executemany(query, process_data)
        conn.commit()


def main():
    while True:
        print("### MONITOR DE PROCESOS ###")
        store_process_info()
        time.sleep(6000)  # Actualizar cada 60 segundos

if __name__ == "__main__":
    main()

# Cerrar la conexión al final del script
if conn.is_connected():
    cursor.close()
    conn.close()
    print("Conexión a MySQL cerrada.")
