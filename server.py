import sys
from base64 import b64decode
from json import loads as bytes_to_json

# Récupération des informations de la requête
http = bytes_to_json(b64decode(sys.argv[1]))

# ===============================
# === Modifier à partir d'ici ===
# ===============================

# Affichage des informations de la requête.
print(http)