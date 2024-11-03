<style>
  #transferForm .form-group {
    display: flex;
    gap: 2rem;
    align-items: flex-end;
    margin-bottom: 2rem;
  }

  @media (max-width: 992px) {
    #transferForm .form-group {
      flex-wrap: wrap;
    }
  }

  #transferForm .form-group-item {
    max-width: 100%;
    width: 100%;
  }

  #transferForm .form-group:has(.form-group-legend) .form-group-item {
    width: 50%;
  }

  #transferForm .form-group-legend {
    width: 50%;
    background-color: #ececec;
    padding: 1rem;
    color: #666;
    font-size: 1rem;
  }

  @media (max-width: 992px) {

    #transferForm .form-group:has(.form-group-legend) .form-group-item,
    #transferForm .form-group-legend {
      width: 100%;
    }

    #transferForm .form-group-legend {
      margin-top: -1.5rem;
    }
  }

  #transferForm label,
  #transferForm .label {
    font-size: 1rem;
    opacity: 0.8;
    display: block;
  }

  #transferForm .label {
    margin-bottom: 1rem;
  }

  #transferForm input {
    letter-spacing: normal !important;
  }

  #transferForm button,
  #transferForm input[type=button] {
    background-color: #34ccff;
    cursor: pointer;
    border: none !important;
    padding: 0.5rem 2rem !important;
  }

  #transferForm button:hover,
  #transferForm input[type=button]:hover {
    background-color: #00bfff;
  }

  #transferForm input[type=checkbox],
  #transferForm input[type=radio] {
    appearance: auto;
  }

  #transferForm #destination-suggestions,
  #transferForm #departure-suggestions {
    background-color: #dadada;
    position: absolute;
    overflow: scroll;
    max-height: 200px;
    min-width: 300px;
    position: absolute;
    z-index: 1;
  }

  #transferForm .suggestion-item {
    cursor: pointer;
    padding: 0.5rem 1rem;
  }

  #transferForm .suggestion-item:hover {
    background-color: #34ccff;
  }

  #transferForm .step {
    display: none;
  }

  #transferForm .step.active {
    display: block;
  }

  #transferForm #step1,
  #transferForm .order-form {
    border: 1px solid #666;
    margin-bottom: 2rem;
    padding: 1rem;
  }

  #transferForm .car-option {
    display: flex;
    gap: 1rem;
    border: 1px solid #666;
    margin-bottom: 2rem;
    padding: 1rem;
    justify-content: space-between;
    align-items: flex-end;
    flex-wrap: wrap;
  }

  #transferForm .car-option-wrapper {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
    align-items: center;
  }

  #transferForm .car-option-image {
    width: 200px;
  }

  #transferForm .car-option-image img {
    width: 200px;
  }

  #transferForm .car-option-info {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    max-width: 600px;
  }

  #transferForm .car-option-title {
    font-size: 1.5rem;
  }

  #transferForm .car-option-brands {
    font-size: 1.1rem;
  }

  #transferForm .car-option-size {
    display: flex;
    gap: 1rem;
    font-size: 0.8rem;
  }

  #transferForm .car-option-order-price {
    font-weight: bold;
    margin-bottom: 1rem;
    font-size: 1.5rem;
  }

  #transferForm .loader {
    width: 30px;
    margin-bottom: -7px;
  }

  #transferForm #map {
    width: 100%;
    height: 400px;
  }

  #transferForm #map input {
    all: unset;
  }

  #transferForm #step3title {
    margin-bottom: 2rem;
  }

  #transferForm .order-wrapper {
    display: flex;
    justify-content: space-between;
    gap: 2rem;
  }

  @media (max-width: 992px) {
    #transferForm .order-wrapper {
      flex-wrap: wrap;
    }

    #transferForm .order-form {
      order: 2;
    }
  }

  #transferForm .order-form-title {
    text-decoration: underline;
    margin-bottom: 1rem;
  }

  #transferForm #orderFormPrice {
    min-height: 100px;
    background: #34ccff;
    color: #fff;
    display: flex;
    padding: 1rem;
    justify-content: center;
    align-items: center;
    gap: 6px;
    font-size: 1.5rem;
    margin-bottom: 2rem;
  }

  #transferForm #orderFormPrice span {
    font-weight: bold;
  }

  #transferForm .order-summary {
    font-size: 1rem;
  }

  #transferForm #backToStart {
    display: block;
    cursor: pointer;
    margin-top: 2rem;
  }
</style>
<script src="https://api-maps.yandex.ru/2.1/?apikey=9440bea9-20b9-41fc-8aed-6846cecae179&lang=ru_RU"
  type="text/javascript"></script>

<form id="transferForm" class="uniForm">
  <!-- Hidden Required Fields -->
  <input type="hidden" name="project_name" value="<?php echo get_bloginfo('title'); ?>">
  <input type="hidden" name="admin_email" value="mr.madu@ya.ru">
  <input type="hidden" name="form_subject" value="Заказ трансфера">
  <!-- END Hidden Required Fields -->
  <div class="step active" id="step1">
    <div class="form-group">
      <div class="form-group-item">
        <label for="departure">Откуда:</label>
        <input type="text" id="departure" name="Пункт отправления" required placeholder="Введите пункт отправления">
        <div id="departure-suggestions" class="suggestions"></div>
        <ul id="cities-list" style="display: none;">
          <li>Сочи</li>
          <li>Минеральные воды</li>
          <li>Новороссийск</li>
        </ul>
      </div>
      <div class="form-group-item">
        <label for="destination">Куда:</label>
        <input type="text" id="destination" name="Пункт прибытия" required placeholder="Введите пункт назначения">
        <div id="destination-suggestions" class="suggestions"></div>
        <ul id="cities-list-destination" style="display: none;">
          <li>Авило-Успенка</li>
          <li>Адлер</li>
          <li>Азов</li>
          <li>Анапа</li>
          <li>Анапа жд вокзал</li>
          <li>Анапская</li>
          <li>Анастасиевская</li>
          <li>Батайск</li>
          <li>Белореченск</li>
          <li>Бетта</li>
          <li>Благовещенская</li>
          <li>Варениковская</li>
          <li>Волгодонск</li>
          <li>Геленджик</li>
          <li>Дивноморское</li>
          <li>Домодедово</li>
          <li>Ейск</li>
          <li>Каневская</li>
          <li>Краснодар</li>
          <li>Крымск</li>
          <li>Майкоп</li>
          <li>Минеральные Воды</li>
          <li>Минеральные Воды аэропорт</li>
          <li>Новороссийск</li>
          <li>Новотитвровская</li>
          <li>Павловская</li>
          <li>Порт Кавказ</li>
          <li>Ростов</li>
          <li>Севастополь</li>
          <li>Симферополь</li>
          <li>Славянск-на-Кубани</li>
          <li>Сочи</li>
          <li>Сочи аэропорт</li>
          <li>Ставрополь</li>
          <li>Старотитаровская</li>
          <li>Таганрог</li>
          <li>Тамань</li>
          <li>Темрюк</li>
          <li>Тимашевск</li>
          <li>Тихорецк</li>
          <li>Туапсе</li>
          <li>Туапсе жд вокзал</li>
          <li>Феодосия</li>
          <li>Шахты</li>
        </ul>
      </div>
    </div>

    <div class="form-group">
      <div class="form-group-item">
        <label for="start">Дата поездки:</label>
        <input type="date" id="start" name="Дата поездки" value="" required />
      </div>
      <div class="form-group-item">
        <input type="button" value="Найти" id="toStep2">
      </div>
    </div>
  </div>

  <div class="step" id="step2">
    <div id="car-options">
      <div class="car-option" data-name="Комфорт" data-price-per-km="42">
        <div class="car-option-wrapper">
          <div class="car-option-image">
            <img src="<?php echo get_template_directory_uri(); ?>/komfort.png" alt="komfort">
          </div>
          <div class="car-option-info">
            <div class="car-option-title">Комфорт (до 3 человек)</div>
            <div class="car-option-brands">
              Hyundai Solaris, Kia Rio, Kia Cerato, Skoda Octavia, Chery Tiggo</div>
            <div class="car-option-size">
              <div><span class="icon_people"></span>до 3 человек</div>
            </div>
          </div>
        </div>
        <div class="car-option-order">
          <small class="car-option-order-points"></small>
          <div class="car-option-order-price"><span>
              <img src="<?php echo get_template_directory_uri(); ?>/load.gif" class="loader" alt="loader">
            </span> руб.</div>
          <input type="button" value="Заказать трансфер" class="toStep3" data-name="Комфорт"
            data-price-per-km="42">
        </div>
      </div>
      <div class="car-option" data-name="Микроавтобус" data-price-per-km="64">
        <div class="car-option-wrapper">
          <div class="car-option-image">
            <img src="<?php echo get_template_directory_uri(); ?>/mikroavtobus.png" alt="mikroavtobus">
          </div>
          <div class="car-option-info">
            <div class="car-option-title">Микроавтобус (до 7 человек)</div>
            <div class="car-option-brands">
              Hyundai H1, Hyundai Grand Starex, Volkswagen Caravelle, Kia Carnival, Ford Tourneo Custom</div>
            <div class="car-option-size">
              <div><span class="icon_people"></span>до 7 человек</div>
            </div>
          </div>
        </div>
        <div class="car-option-order">
          <small class="car-option-order-points"></small>
          <div class="car-option-order-price"><span>
              <img src="<?php echo get_template_directory_uri(); ?>/load.gif" class="loader" alt="loader">
            </span> руб.</div>
          <input type="button" value="Заказать трансфер" class="toStep3" data-name="Микроавтобус"
            data-price-per-km="64">
        </div>
      </div>
      <div class="car-option" data-name="Бизнес" data-price-per-km="84">
        <div class="car-option-wrapper">
          <div class="car-option-image">
            <img src="<?php echo get_template_directory_uri(); ?>/biznes.png" alt="biznes">
          </div>
          <div class="car-option-info">
            <div class="car-option-title">Бизнес (до 3 человек)</div>
            <div class="car-option-brands">
              Mercedes E-class, Toyota Camry</div>
            <div class="car-option-size">
              <div><span class="icon_people"></span>до 3 человек</div>
            </div>
          </div>
        </div>
        <div class="car-option-order">
          <small class="car-option-order-points"></small>
          <div class="car-option-order-price"><span>
              <img src="<?php echo get_template_directory_uri(); ?>/load.gif" class="loader" alt="loader">
            </span> руб.</div>
          <input type="button" value="Заказать трансфер" class="toStep3" data-name="Бизнес"
            data-price-per-km="84">
        </div>
      </div>
    </div>
    <div id="map"></div>
  </div>

  <div class="step" id="step3">
    <div class="order-title">
      <h2 id="step3title">Трансфер <span></span></h2>
    </div>
    <div class="order-wrapper">
      <div class="order-form">
        <h4 class="order-form-title">1. Трансфер</h4>
        <div class="form-group">
          <div class="form-group-item">
            <label for="pickupPlace">Адрес отправки</label>
            <input type="text" name="Адрес отправки" id="pickupPlace" placeholder="Например: отель Юг" required>
          </div>
          <div class="form-group-legend">Укажите место, название отеля или достопримечательность</div>
        </div>
        <div class="form-group">
          <div class="form-group-item">
            <label for="time">Время подачи трансфера</label>
            <input type="time" min="00:00" max="23:59" id="time" name="Время подачи трансфера" placeholder="ЧЧ:ММ" required>
          </div>
          <div class="form-group-legend">Местное время в формате 24 ч</div>
        </div>
        <div class="form-group">
          <div class="form-group-item">
            <label for="arrivePlace">Адрес прибытия</label>
            <input type="text" name="Адрес прибытия" id="arrivePlace" placeholder="Например: отель Юг" required>
          </div>
          <div class="form-group-legend">Укажите место, название отеля или достопримечательность</div>
        </div>
        <div class="form-group">
          <div class="form-group-item">
            <label for="passCount">Количество пассажиров (включая детей)</label>
            <select name="Количество пассажиров" id="passCount" required=data-count="4">
              <option disabled="" value="0">- Количество пассажиров -</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
            </select>
          </div>
          <div class="form-group-legend">Дети до 18 лет ездят только в сопровождении взрослых</div>
        </div>
        <div class="form-group">
          <div class="form-group-item">
            <div class="label">Дополнительные опции</div>
            <label>
              <input name="Встреча с табличкой" id="meetTable" type="checkbox" class="checkBox" value="Да">
              Встреча с табличкой
            </label>
            <label>
              <input name="Перевозка домашних животных" id="withPets" type="checkbox" class="checkBox" value="Да">
              Перевозка домашних животных
            </label>
          </div>
        </div>
        <hr>
        <br>
        <h4 class="order-form-title">2. Контактные данные</h4>
        <div class="form-group">
          <div class="form-group-item">
            <label for="name">Имя и фамилия</label>
            <input type="text" name="Имя и фамилия" id="name" required>
          </div>
          <div class="form-group-legend">Имя и фамилия будут написаны на табличке у водителя</div>
        </div>
        <div class="form-group">
          <div class="form-group-item">
            <label for="tel">Номер телефона</label>
            <input type="tel" name="Номер телефона" id="tel" placeholder="+7 (   )    -  -  " required>
          </div>
          <div class="form-group-legend">Телефон необходим для оперативной связи с водителем</div>
        </div>
        <div class="form-group">
          <div class="form-group-item">
            <label for="email">Адрес электронной почты</label>
            <input type="email" name="Адрес электронной почты" id="email" placeholder="e-mail@domain.ru" required>
          </div>
          <div class="form-group-legend">Для отправления Вам письма со всей необходимой информацией</div>
        </div>
        <div class="form-group">
          <div class="form-group-item">
            <label for="comment">Комментарий</label>
            <textarea name="Комментарий" id="comment"></textarea>
          </div>
        </div>
        <br>
        <h4 class="order-form-title">3. Способ оплаты</h4>
        <div class="form-group">
          <fieldset class="form-group-item">
            <legend class="label">Выберите метод оплаты</legend>
            <label>
              <input type="radio" name="Метод оплаты" id="payCard" class="radioBox" value="Оплата картой или рассрочка">
              Оплата картой
            </label>
            <label>
              <input type="radio" name="Метод оплаты" id="payCash" class="radioBox" value="Оплата наличными водителю">
              Оплата наличными водителю
            </label>
          </fieldset>
        </div>
        <div id="orderFormPrice">Цена трансфера: <span></span> руб</div>
        <div class="form-group">
          <div class="form-group-item">
            <label>
              <input name="Согласие с правилами" id="isAgree" type="checkbox" class="checkBox" required value="Да">
              Я подтверждаю, что прочитал и согласен с <a href="/user-agreement/" target="_blank">Пользовательским соглашением</a> и <a href="/privacy-policy/" target="_blank">политикой конфиденциальности</a>
            </label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-group-item">
          <input type="submit" id="TBankButton" value="Заказать трансфер">
          </div>
        </div>
      </div>
      <div class="order-summary">
        <h3>Информация о заказе</h4>
          <div id="orderClass"><b>Класса авто:</b> <span></span></div>
          <div id="orderRoute"><b>Маршрут:</b> <span></span></div>
          <div id="orderRouteTime"><b>Ориентировочное время в пути:</b> <span></span></div>
          <div id="orderPrice"><b>Стоимость поездки:</b> <span></span> руб.</div>
      </div>
    </div>
    <span id="backToStart">← Вернуться назад</span>
  </div>
</form>

<script>
  const transferForm = document.querySelector('#transferForm');
  const step1 = document.getElementById('step1');
  const step2 = document.getElementById('step2');
  const toStep2Button = document.getElementById('toStep2');
  const toStep3Button = document.querySelectorAll('.toStep3');
  const backToStart = document.getElementById('backToStart');

  const dateInput = document.getElementById('start');
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1); // Устанавливаем завтрашнюю дату
  const year = tomorrow.getFullYear();
  const month = String(tomorrow.getMonth() + 1).padStart(2, '0'); // Месяцы начинаются с 0, поэтому добавляем 1
  const day = String(tomorrow.getDate()).padStart(2, '0');
  dateInput.value = `${year}-${month}-${day}`; // Форматируем как YYYY-MM-DD

  let routeFields = {
    date: null,
    departure: null,
    destination: null,
    distance: null,
    totalPrice: null,
    carClass: null,
    rate: null
  }

  toStep2Button.addEventListener('click', function() {
    if (!document.getElementById('departure').value || !document.getElementById('destination').value) {
      alert('Пожалуйста, выберите пункты отправления и назначения.');
      return;
    }
    if (!document.getElementById('start').value) {
      alert('Пожалуйста, выберите дату');
      return;
    }

    routeFields.date = document.getElementById('start').value;
    routeFields.departure = document.getElementById('departure').value
      .split(' ')
      .map((word) => `${word[0].toUpperCase()}${word.slice(1).toLowerCase()}`).join(' ');
    routeFields.destination = document.getElementById('destination').value
      .split(' ')
      .map((word) => `${word[0].toUpperCase()}${word.slice(1).toLowerCase()}`).join(' ');

    step2.classList.add('active');
    document.getElementById('map').innerHTML = '';
    document.getElementById('departure-suggestions').innerHTML = '';
    document.getElementById('destination-suggestions').innerHTML = '';
    // step2.scrollIntoView();

    // Инициализация карты
    ymaps.ready(init);
  });

  toStep3Button.forEach(btn => {
    btn.addEventListener('click', function() {
      routeFields.carClass = this.getAttribute('data-name');
      routeFields.totalPrice = Math.round((routeFields.distance * this.getAttribute('data-price-per-km')) / 500) * 500;
      routeFields.totalPrice == 0 ? routeFields.totalPrice = 500 : routeFields.totalPrice = routeFields.totalPrice;
      routeFields.rate = this.getAttribute('data-price-per-km');
      step1.classList.remove('active');
      step2.classList.remove('active');
      step3.classList.add('active');
      document.querySelector('#step3title span').innerHTML = `${routeFields.departure} - ${routeFields.destination}`;
      document.querySelector('#orderClass span').innerHTML = `${routeFields.carClass}`;
      document.querySelector('#orderRoute span').innerHTML = `${routeFields.departure} → ${routeFields.destination}`;
      document.querySelector('#orderRouteTime span').innerHTML = `${Math.round(routeFields.distance / 10) * 10} минут`;
      document.querySelector('#orderPrice span').innerHTML = `${routeFields.totalPrice}`;
      document.querySelector('#orderFormPrice span').innerHTML = `${routeFields.totalPrice}`;
     })
  });

  let payWay = null;
  document.querySelectorAll('input[name="Метод оплаты"]').forEach(option => {
    option.addEventListener('change', updateButtonValue);
  });

  function updateButtonValue(event) {
    payWay = event.target.id;
    console.log(payWay);
    if (payWay === 'payCard') {
      document.querySelector('#TBankButton').value = 'Оплатить';
    } else {
      document.querySelector('#TBankButton').value = 'Заказать трансфер';
    }
  }


  function init() {
    const map = new ymaps.Map("map", {
      center: [44.723771, 37.768813], // Центр карты по умолчанию (Новороссийск)
      zoom: 7,
      controls: ['typeSelector', 'fullscreenControl', 'zoomControl']
    });

    ymaps.route([routeFields.departure, routeFields.destination]).then(function(route) {
      const from = route.requestPoints[0];
      const to = route.requestPoints[1];

      map.geoObjects.add(route);

      routeFields.distance = (route.getLength() / 1000).toFixed(0); // Расстояние маршрута в км

      const carOptions = document.querySelectorAll('#car-options .car-option');

      carOptions.forEach(car => {
        // Расчет стоимости поездки в рублях с округлением до 500 рублей
        totalPrice = Math.round((routeFields.distance * car.getAttribute('data-price-per-km')) / 500) * 500;
        totalPrice == 0 ? totalPrice = 500 : totalPrice = totalPrice;
        car.querySelector('.car-option-order-price span').innerHTML = totalPrice;
        car.querySelector('.car-option-order-points').innerHTML = `${routeFields.departure} → ${routeFields.destination}`;
      });
    }, function(error) {
      alert('Не удалось построить маршрут');
    });
  }

  backToStart.addEventListener('click', function() {
    step1.classList.add('active');
    step2.classList.add('active');
    step3.classList.remove('active');
  });

  // Функция для отображения подсказок
  function showSuggestions(input, suggestionsContainer, citiesList) {
    const inputValue = input.value.toLowerCase();
    suggestionsContainer.innerHTML = ''; // Очищаем предыдущие подсказки

    if (inputValue) {
      citiesList.forEach(city => {
        if (city.textContent.toLowerCase().includes(inputValue)) {
          const suggestionItem = document.createElement('div');
          suggestionItem.classList.add('suggestion-item');
          suggestionItem.textContent = city.textContent;
          suggestionItem.addEventListener('click', () => {
            input.value = city.textContent;
            suggestionsContainer.innerHTML = ''; // Очищаем подсказки после выбора
          });
          suggestionsContainer.appendChild(suggestionItem);
        }
      });
    }
  }

  // Привязываем события ввода к полям
  document.getElementById('departure').addEventListener('input', function() {
    showSuggestions(this, document.getElementById('departure-suggestions'),
      document.querySelectorAll('#cities-list li')
    );
  });

  document.getElementById('destination').addEventListener('input', function() {
    showSuggestions(this, document.getElementById('destination-suggestions'),
      document.querySelectorAll('#cities-list-destination li')
    );

    const mailPath = '<?php echo get_template_directory_uri(); ?>/calc-transfer/mail.php'
    document.querySelector('.uniForm').addEventListener('submit', function(e) {
      // e.preventDefault();
      let th = this,
        params = new FormData(this),
        request = new XMLHttpRequest();
      const submitButton = th.querySelector('input[type="submit"]');
      // Отключаем кнопку отправки, чтобы предотвратить повторные нажатия
      if (submitButton.disabled) {
        e.preventDefault();
        return;
      }
      submitButton.disabled = true;

      request.open('POST', mailPath, true)
      request.send(params)
      request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          th.reset();
          if (payWay !== 'payCard') {
            alert('Спасибо, ваша заявка отправлена!');
          }
        }
      }
      e.preventDefault();
      if (payWay == 'payCard') {
        alert('Отправляем на страницу оплаты');
      }
    })
  });
</script>