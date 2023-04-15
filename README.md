# Test-Emie
Voici un test technique demandé par l'entreprise Emie, il s'agit de la création d'une api comprenant une route renvoyant un mot inverser donné en paramètre et une route comprenant l'upload d'un fichier la lecture de celui-ci et une correction de son contenu 



## Pour tester l'api.
### Route qui prend en paramètre un mot :
- curl --request GET \
  --url http://127.0.0.1:8000/api/mot/{mot}

### Route qui prend un fichier et applique une correction sur celui ci :
   - curl --request POST \
    --url 'http://127.0.0.1:8000/api/filetest?correction=lower' \
    --header 'Content-Type: multipart/form-data' \
    --form file=@{filePath}
   - curl --request POST \
     --url 'http://127.0.0.1:8000/api/filetest?correction=upper' \
     --header 'Content-Type: multipart/form-data' \
     --form file=@{filePath}
