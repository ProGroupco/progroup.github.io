#!/bin/bash

# --- OReboot (Project ORI) Auto-Installer ---
# Languages: Assembly, Python, JS, HTML, CSS, PHP, Shell

echo "🚀 Starting Project ORI System Setup..."

# Update packages
pkg update && pkg upgrade -y

echo "📦 Installing System Tools (Assembly & Shell)..."
pkg install nasm qemu-system-i386-headless make -y

echo "🐍 Installing Python (AI & Logic)..."
pkg install python -y

echo "🌐 Installing Web Stack (JS, HTML, CSS)..."
pkg install nodejs -y

echo "🐘 Installing PHP (Pro Cloud Backend)..."
pkg install php -y

echo "📂 Creating Project ORI Folder Structure..."
mkdir -p system apps cloud store

echo "✅ Setup Complete! All languages are ready."
echo "Type 'nasm -v' or 'python --version' to check."
echo "🗄️ Installing SQLite (The Cloud Database)..."
pkg install sqlite -y
echo "☕ Installing Java (The Enterprise Engine)..."
pkg install openjdk-17 -y
echo "💎 Installing Ruby (The Automation Specialist)..."
pkg install ruby -y
