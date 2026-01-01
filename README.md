<div align="center">

  <a href="https://github.com/kyo1337/RandomCCNumber">
    <img src="https://i.ibb.co/60yC5Vd/cc.png" alt="CC Generator" width="120">
  </a>

  <h1>Random CC Number Generator</h1>

  <p>
    <b>Z3R0-K x Mari Partner</b>
    <br>
    A high-speed, offline-capable valid Credit Card number generator.
    <br>
    <br>
    <a href="https://github.com/kyo1337/RandomCCNumber/blob/master/LICENSE">
      <img src="https://img.shields.io/github/license/kyo1337/RandomCCNumber?style=flat-square&color=blueviolet" alt="License">
    </a>
    <a href="https://github.com/kyo1337/RandomCCNumber/issues">
      <img src="https://img.shields.io/github/issues/kyo1337/RandomCCNumber?style=flat-square&color=orange" alt="Issues">
    </a>
    <a href="https://github.com/kyo1337/RandomCCNumber/stargazers">
      <img src="https://img.shields.io/github/stars/kyo1337/RandomCCNumber?style=flat-square&color=ff69b4" alt="Stars">
    </a>
  </p>

</div>

---

## ⚡️ Key Features

- **Offline First**: Zero API dependencies. Safe and fast.
- **Luhn Algorithm**: Generates mathematically valid credit card numbers.
- **BIN Support**: Target specific banks with BIN inputs (e.g., `454321`).
- **Complete Identity**: Includes realistic names, addresses, and contact info.
- **Instant Speed**: Generates thousands of test records in milliseconds.

## 📦 Installation

This tool requires **PHP** to run.

```bash
# Update System
apt update && apt upgrade -y

# Install PHP and Git
apt install php git -y

# Clone Repository
git clone https://github.com/kyo1337/RandomCCNumber
cd RandomCCNumber
```

## 🚀 Usage

Run the script directly from your terminal:

```bash
php CC-RANDOM-NUMBER.php
```

### Interactive Menu

1. **BIN**: Input a 6-digit BIN (e.g., `539983`) or leave blank for a random VISA/Mastercard.
2. **Count**: Enter the number of cards to generate.
3. **Delay**: Set a delay in seconds (use `0` for max speed).

## ⚠️ Disclaimer

> [!WARNING] > **EDUCATIONAL PURPOSE ONLY**.
> This tool generates random numbers that verify against the Luhn algorithm. They are **NOT** real, issued, or funded cards.
>
> This tool is intended for:
>
> - Software Testing (Checkout logic validation)
> - Security Research (Regex testing)
> - Educational demonstrations of the Luhn algorithm
>
> The developers are not responsible for any misuse. **Do not use for fraud.**

## 🤝 Credits

- **Coder**: [Kyuoko](https://github.com/kyo1337)
- **Team**: Z3R0-K | Mari Partner
