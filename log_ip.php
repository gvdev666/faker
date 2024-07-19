<?php
// Obtén la dirección IP del visitante
$ip = $_SERVER['REMOTE_ADDR'];

// Ruta al archivo JSON
$file = 'ips.json';

// Lee el contenido actual del archivo JSON
$current_data = file_get_contents($file);
$array_data = json_decode($current_data, true);

// Si no hay datos en el archivo, crea un nuevo array
if (!is_array($array_data)) {
    $array_data = [];
}

// Añade la nueva IP al array
$array_data[] = ['ip' => $ip, 'timestamp' => date('Y-m-d H:i:s')];

// Convierte el array a formato JSON
$json_data = json_encode($array_data, JSON_PRETTY_PRINT);

// Guarda los datos actualizados en el archivo JSON
file_put_contents($file, $json_data);

// Envía una respuesta
echo json_encode(['status' => 'success', 'ip' => $ip]);
?>
