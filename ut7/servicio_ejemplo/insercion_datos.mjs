import Z from "zebras";
import process from "process";
import mysql from "mysql2/promise";
import path from "path";
import { readFileSync, existsSync } from "fs";

async function main() {
  try {
    // Obtener la ruta del certificado SSL
    const actualDir = path.resolve(".");
    const rutaCert = path.join(actualDir, "ca.pem");

    if (!existsSync(rutaCert)) {
      throw new Error("El archivo ca.pem no existe en la ruta especificada.");
    }

    const cert = readFileSync(rutaCert);

    // Crear conexión a la base de datos
    const conn = await mysql.createConnection({
      host: process.env.DB_HOST,
      port: process.env.DB_PORT,
      user: process.env.DB_USER,
      password: process.env.DB_PASSWORD,
      database: process.env.DB_NAME,
      charset: "utf8mb4",
      ssl: {
        ca: cert,
      },
    });

    console.log("Conexión exitosa");

    // Limpiar tabla existente
    const queryClean = "DROP TABLE IF EXISTS polen";
    await conn.query(queryClean);

    // Crear tabla
    const queryDDL = `CREATE TABLE polen(
      id INTEGER AUTO_INCREMENT PRIMARY KEY,
      captador VARCHAR(20),
      fecha_lectura DATETIME,
      tipo_polinico VARCHAR(30),
      granos_m_3 INTEGER DEFAULT 0 NOT NULL
    )`;

    await conn.query(queryDDL);
    console.log("Tabla polen creada exitosamente");

    // Validar que el archivo CSV existe
    const csvPath = path.join(actualDir, "polen_madrid_23_01_25.csv");
    if (!existsSync(csvPath)) {
      throw new Error("El archivo CSV no existe.");
    }

    // Leer y procesar el archivo CSV
    const df = Z.readCSV(csvPath);
    const df_numerico = Z.parseNums(["granos_de_polen_x_metro_cubico"], df);

    //console.log("Datos procesados desde el CSV:", df_numerico);

    // Preparar la consulta de inserción
    const queryDML = `INSERT INTO polen (captador, fecha_lectura, tipo_polinico, granos_m_3)
      VALUES (?, ?, ?, ?)`;

    // Insertar datos en la base de datos
    for (let fila of df_numerico) {
      const {
        captador,
        fecha_lectura,
        tipo_polinico,
        granos_de_polen_x_metro_cubico,
      } = fila;
      
      // Validar que todos los datos necesarios están presentes
      if (
        captador == null ||            // `null` o `undefined`
        fecha_lectura == null ||       // `null` o `undefined`
        tipo_polinico == null ||       // `null` o `undefined`
        granos_de_polen_x_metro_cubico == null || isNaN(granos_de_polen_x_metro_cubico) // Asegurar que es un número
      ) {
        console.log("Fila inválida, se omite:", fila);
        continue;
      }

      await conn.query(queryDML, [
        captador,
        fecha_lectura,
        tipo_polinico,
        granos_de_polen_x_metro_cubico,
      ]);
    }

    console.log("Datos de polen insertados correctamente");

    // Cerrar conexión
    await conn.end();
    console.log("Conexión cerrada");
  } catch (err) {
    console.error("Error:", err.message);
  }
}

// Ejecutar la función principal
main();
