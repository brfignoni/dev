##Checklist

**Contemplar Colecciones vacias**
Al incorporar 'pagination' a una pagina, tenemos que indicar la collection. Si la collection estuviese vacia, no se generan las paginas, y al tratar de acceder a cualquiera de ellas se obtiene un **404**. Para evitar esto se pueden hacer dos cosas:

- generar una **empty page** con `generatePageOnEmptyData:true`. Esto nos permite generar la primer pagina de la paginacion, independientemente de si la coleccion esta vacia o no: https://www.11ty.dev/docs/pagination/#generating-an-empty-results-page
- 

**Agregar scripts**

```
  "scripts": {
    "prebuild": "rimraf ./_site",
    "build": "rollup --config && npx @11ty/eleventy",
    "serve": "rollup --config && rimraf ./_site && npx @11ty/eleventy --serve",
    "debug": "DEBUG=* npx @11ty/eleventy",
    "test": "echo \"Error: no test specified\" && exit 1"
  },
```
