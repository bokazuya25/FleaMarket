/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/payment.js ***!
  \*********************************/
document.addEventListener('DOMContentLoaded', function () {
  // クレジットカード番号のフォーマット処理
  document.getElementById('credit-card-number').addEventListener('input', function (e) {
    var input = e.target.value.split(' ').join('');
    if (input.length > 0) {
      input = input.match(new RegExp('.{1,4}', 'g')).join(' ');
    }
    e.target.value = input;
  });

  // <input class="input-button">のクリックイベント
  document.querySelector('.input-button').addEventListener('click', function () {
    // カード情報の表示追加更新処理
    var cardNumber = document.getElementById('credit-card-number').value.replace(/\s+/g, '');
    var expiryMonth = document.querySelector('.select-limit[name="month"]').value;
    var expiryYear = document.querySelector('.select-limit[name="year"]').value;
    var cardName = document.querySelector('.input-name').value;
    var cardBrand = getCardBrand(cardNumber);
    var cardBrandImage = getCardBrandImage(cardBrand);
    var isValid = true;
    var errorMessage = '';
    if (!cardNumber.match(/^[0-9]{16}$/)) {
      errorMessage += 'カード番号が正しくありません。\n';
      isValid = false;
    } else if (cardBrand === 'Unknown') {
      errorMessage += '対応したカードブランドではありません。\n';
    }
    if (expiryMonth === '月' || expiryYear === '年') {
      errorMessage += '有効期限が選択されていません。\n';
      isValid = false;
    }
    if (cardName.trim() === '') {
      errorMessage += 'カード名義を入力してください。\n';
      isValid = false;
    }
    if (!isValid) {
      alert(errorMessage);
    } else {
      document.querySelector('.card-brand').textContent = cardBrand;
      document.querySelector('.card-brand__image').src = cardBrandImage;
      document.querySelector('.card-number').textContent = '下4桁 ' + cardNumber.slice(-4);
      document.querySelector('.card-limit').textContent = expiryMonth + '/' + expiryYear;
      document.querySelector('.card-name').textContent = cardName;

      // ラベル名の変更
      var cardRadio = document.querySelector('.create-card__label .card-radio');
      var cardRadioLabel = document.querySelector('.create-card__label');
      if (cardRadio) {
        cardRadioLabel.innerHTML = cardRadio.outerHTML + '登録したカードを変更する';
      }

      // ボタン内テキストの変更
      var inputButton = document.querySelector('.input-button');
      inputButton.value = '変更';

      // カードテーブルの表示
      var paymentTable = document.querySelector('.payment-table');
      if (paymentTable.style.display === 'none') {
        paymentTable.style.display = '';
      }

      // カード追加変更後、カードテーブルをチェック状態にする
      var tableRadio = document.querySelector('.payment-table .card-radio');
      if (tableRadio) {
        tableRadio.checked = true;
      }
    }
  });

  // クレジットカードブランドの判定
  function getCardBrand(number) {
    var re = {
      visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
      mastercard: /^5[1-5][0-9]{14}$/,
      jcb: /^(?:2131|1800|35\d{3})\d{11}$/
    };
    if (re.visa.test(number)) {
      return 'Visa';
    } else if (re.mastercard.test(number)) {
      return 'MasterCard';
    } else if (re.jcb.test(number)) {
      return 'JCB';
    } else {
      return 'Unknown';
    }
  }

  // カードブランドイメージの選択
  function getCardBrandImage(brand) {
    var images = {
      'Visa': visaImageUrl,
      'MasterCard': mastercardImageUrl,
      'JCB': jcbImageUrl
    };
    return images[brand] || '';
  }

  // <input type="radio">のクリック範囲設定
  var tableRow = document.querySelector('.payment-row');
  tableRow.addEventListener('click', function () {
    var radioButton = this.querySelector('.card-radio');
    if (radioButton && !radioButton.checked) {
      radioButton.checked = true;
      radioButton.dispatchEvent(new Event('change'));
    }
  });
  var createRow = document.querySelector('.create-card__list');
  createRow.addEventListener('click', function () {
    var radioButton = this.querySelector('.card-radio__create');
    if (radioButton && !radioButton.checked) {
      radioButton.checked = true;
      radioButton.dispatchEvent(new Event('change'));
    }
  });
});
/******/ })()
;