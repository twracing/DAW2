#!/bin/bash
echo "======================================"
echo "   Comprobación básica del sistema"
echo "======================================"
echo

# 1. Versión del sistema
echo "📌 Versión del sistema:"
uname -a
echo

# 2. Espacio en disco
echo "📌 Espacio en disco:"
df -h /
echo

# 3. Memoria disponible
echo "📌 Memoria disponible:"
free -h
echo

# 4. Estado del servicio SSH
echo "📌 Estado del servicio SSH:"
if systemctl is-active --quiet ssh; then
    echo "✅ El servicio SSH está ACTIVO"
else
    echo "❌ El servicio SSH NO está activo"
fi

echo
echo "======================================"
echo "   Comprobación finalizada"
echo "======================================"

