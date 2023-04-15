# Test-Emie


# Pour tester l'api.
## Route qui prend en param un mot.:
- curl --request GET \
  --url http://127.0.0.1:8000/api/mot/{mot}

## Route qui prend un fichier et applique une correction sur celui ci:
   - curl --request POST \
    --url 'http://127.0.0.1:8000/api/filetest?correction=lower' \
    --header 'Content-Type: multipart/form-data' \
    --form file=@{filePath}
   - curl --request POST \
     --url 'http://127.0.0.1:8000/api/filetest?correction=upper' \
     --header 'Content-Type: multipart/form-data' \
     --form file=@{filePath}