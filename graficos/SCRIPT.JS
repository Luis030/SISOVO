window.addEventListener('DOMContentLoaded', () => {

    $.ajax({
        url: 'informesPorMes.php', 
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            const meses = data.map(item => item.mes); 
            const cantidades = data.map(item => item.cantidad); 

            const contexto = document.getElementById('graficoListas').getContext('2d');
            const graficoListas = new Chart(contexto, {
                type: 'bar', 
                data: {
                    labels: meses, 
                    datasets: [{
                        label: 'Cantidad de Informes',
                        data: cantidades, 
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function(error) {
            console.error("Error al obtener los datos: ", error);
        }
    });
});