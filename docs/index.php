<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Прогноз графика TRUMP/USDT</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>График TRUMP/USDT (Bybit API)</h1>

    <!-- Блок с основным графиком -->
    <div class="chart-container">
        <canvas id="cryptoChart" width="800" height="400"></canvas>
    </div>

    <!-- Блок с графиками индикаторов -->
    <div class="chart-container">
        <h2>Индикаторы</h2>
        <div class="indicators">
            <canvas id="rsiChart" width="800" height="200"></canvas>
            <canvas id="atrChart" width="800" height="200"></canvas>
        </div>
    </div>

    <!-- Прогноз на следующие 60 минут -->
    <h2>Прогноз на следующие 60 минут</h2>
    <div id="predictionOutput"></div>

    <!-- Анализ данных -->
    <h2>Анализ рынка</h2>
    <div id="analysisOutput"></div>

    <!-- Сводная информация -->
    <h2>Текущее состояние рынка</h2>
    <div id="marketSummary"></div>

    <script>
        // Функция для создания графиков
        function createCharts() {
            const ctx1 = document.getElementById('cryptoChart').getContext('2d');
            const cryptoChart = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Цена закрытия TRUMP/USDT',
                        data: [],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: { responsive: true }
            });

            const ctx2 = document.getElementById('rsiChart').getContext('2d');
            const rsiChart = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'RSI',
                        data: [],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            min: 0,
                            max: 100
                        }
                    }
                }
            });

            const ctx3 = document.getElementById('atrChart').getContext('2d');
            const atrChart = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'ATR',
                        data: [],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: { responsive: true }
            });

            return { cryptoChart, rsiChart, atrChart };
        }

        // Обновление данных
        function updateCharts() {
            fetch('data.php') // Получаем данные с сервера
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                        return;
                    }

                    const { cryptoChart, rsiChart, atrChart } = createCharts();

                    // Обновляем основной график
                    cryptoChart.data.labels = data.labels;
                    cryptoChart.data.datasets[0].data = data.prices;
                    cryptoChart.update();

                    // Обновляем график RSI
                    rsiChart.data.labels = data.labels.slice(-20); // Отображаем последние 20 значений
                    rsiChart.data.datasets[0].data = Array.isArray(data.rsi) ? data.rsi.slice(-20) : [data.rsi];
                    rsiChart.update();

                    // Обновляем график ATR
                    atrChart.data.labels = data.labels.slice(-20); // Отображаем последние 20 значений
                    atrChart.data.datasets[0].data = Array.isArray(data.atr) ? data.atr.slice(-20) : [data.atr];
                    atrChart.update();

                    // Выводим прогноз на каждую минуту
                    let predictionOutput = document.getElementById('predictionOutput');
                    predictionOutput.innerHTML = '<h3>Прогноз на каждую минуту:</h3><ul>';
                    if (data.predicted_labels && data.predicted_prices) {
                        data.predicted_labels.forEach((label, index) => {
                            let trend = (data.predicted_prices[index] > data.prices[data.prices.length - 1]) ? 'Рост' : 'Падение';
                            predictionOutput.innerHTML += `<li>${label}: ${trend} (${data.predicted_prices[index]} USDT)</li>`;
                        });
                    } else {
                        predictionOutput.innerHTML += '<li>Нет данных для прогноза.</li>';
                    }
                    predictionOutput.innerHTML += '</ul>';

                    // Выводим анализ
                    let analysisOutput = document.getElementById('analysisOutput');
                    analysisOutput.innerHTML = `
                        <h3>Анализ:</h3>
                        <ul>
                            <li><strong>ATR (волатильность):</strong> ${data.atr}</li>
                            <li><strong>RSI (относительная сила):</strong> ${data.rsi}</li>
                            <li><strong>Тренд:</strong> ${data.trend}</li>
                            <li><strong>Предсказанное направление:</strong> ${data.predictedDirection}</li>
                        </ul>
                    `;

                    // Выводим сводную информацию
                    let marketSummary = document.getElementById('marketSummary');
                    marketSummary.innerHTML = `
                        <h3>Текущее состояние рынка:</h3>
                        <ul>
                            <li><strong>Текущая цена:</strong> ${data.current_price} USDT</li>
                            <li><strong>Индексная цена:</strong> ${data.index_price} USDT</li>
                            <li><strong>Маркировочная цена:</strong> ${data.mark_price} USDT</li>
                            <li><strong>Открытый интерес:</strong> ${data.open_interest}</li>
                            <li><strong>Объем торгов за 24 часа:</strong> ${data.volume_24h} USDT</li>
                            <li><strong>Ставка финансирования:</strong> ${data.funding_rate * 100}%</li>
                        </ul>
                    `;
                })
                .catch(error => console.error('Ошибка загрузки данных:', error));
        }

        setInterval(updateCharts, 60000); // Обновление данных каждые 60 секунд
        updateCharts(); // Загрузка при старте
    </script>
</body>
</html>