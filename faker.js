function logIp() {
    fetch('log_ip.php')
      .then(response => response.json())
      .then(data => console.log(data))
      .catch(error => console.error('Error:', error));
  }
  