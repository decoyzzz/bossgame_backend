import requests

url = "http://100.116.230.26:228/bossgame_backend/log_score.php"

try:
    response = requests.get(url, timeout=5)
    if response.status_code == 200:
        print("Server is avaliable!\n")

        payload = {
        "player": "Adrian",
        "score": "korwek"
        }
        response = requests.post(url, json=payload, timeout = 3)
        data = response.json()
        if data["status"] == "ok":
            print("Sent succesfully!")
        else:
            print("Error:", data.get("message"))

    else:
        print("Server is avaliable, but the respond is:", response.status_code)
except requests.exceptions.RequestException as e:
    print("Server unavailable:", e)