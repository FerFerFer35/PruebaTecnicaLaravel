# 📊 Prueba Técnica Laravel – Gestión de Ingresos y Gastos

Este proyecto es una aplicación desarrollada con **Laravel** que permite la gestión de **proveedores**, **ingresos**, **gastos** y la visualización de **utilidades** y **gráficas mensuales** comparativas.

---

## 🧰 Requisitos previos

Antes de instalar y ejecutar la aplicación, es necesario contar con las siguientes versiones (con las que fue desarrollado el proyecto):

- **PHP:** 8.3.28  
- **Composer:** 2.8.12  
- **Node.js:** 24.13.0  
- **NPM:** 11.7.0  

---

## 🧩 Componentes esenciales de la aplicación

La arquitectura del proyecto sigue el patrón **MVC** de Laravel. Los componentes principales se encuentran organizados de la siguiente manera:

- **app → Http → Controllers**  
  Contiene la lógica de negocio y procesamiento de datos para:
  - Incomes (Ingresos)
  - Expenses (Gastos)
  - Providers (Proveedores)

- **app → Models**  
  Define los modelos Eloquent que representan las entidades del sistema y su relación con la base de datos:
  - Provider
  - Income
  - Expense  
  Cada modelo encapsula reglas, relaciones y acceso a los datos.

- **database → factories**  
  Definición de fábricas para la generación de datos de prueba.

- **database → migrations**  
  Mapeo y definición de las tablas de la base de datos.

- **database → seeders**  
  Inicialización y carga de datos de prueba en la base de datos.

- **resources → views → components**  
  Componentes Blade reutilizables para mantener consistencia visual.

- **resources → views → expenses**  
  Vistas relacionadas con las acciones de gastos.

- **resources → views → incomes**  
  Vistas relacionadas con las acciones de ingresos.

- **resources → views → providers**  
  Vistas para la gestión de proveedores.

- **resources → views → charts**  
  Vista que muestra la gráfica comparativa mensual de ingresos y gastos.

- **resources → views → home.blade.php**  
  Punto de entrada principal de la aplicación.

- **routes → web.php**  
  Definición de las rutas web del sistema.

---

## 🖥️ Vistas y funcionalidades

### 🏠 Inicio

Pantalla principal que contiene un menú de navegación para acceder a todos los módulos de la aplicación.

---

### 📈 Utilidades

Muestra:
- Total de ingresos por proveedor.
- Total de gastos por proveedor.
- Utilidad resultante (positiva o negativa).
- Detalle individual de cada ingreso y gasto asociado al proveedor.

---

### 🏢 Proveedores

Muestra la lista de proveedores registrados con las siguientes funcionalidades:
- Búsqueda por nombre.
- Registro de nuevos proveedores.
- Edición de proveedores existentes.
- Eliminación de proveedores.

**Restricción:**  
El nombre del proveedor debe ser **único**. No se permite registrar un proveedor con un nombre ya existente.

---

### 💰 Ingresos

Permite visualizar y gestionar los ingresos registrados con la siguiente información:
- Proveedor
- Fecha
- Monto
- Descripción

**Funcionalidades:**
- Filtro por proveedor y fecha.
- Registro, edición y eliminación de ingresos.

**Restricciones al registrar o editar:**
- La fecha se carga automáticamente con la fecha actual.
- No se permite registrar ni editar ingresos con fechas futuras.

---

### 💸 Gastos

Cuenta con las mismas funcionalidades y restricciones que el módulo de **Ingresos**, aplicadas al registro de gastos:
- Proveedor
- Fecha
- Monto
- Descripción
- Filtros, edición y eliminación

---

### 📊 Gráfica

Muestra una **gráfica de barras** comparativa que representa:
- Suma mensual de ingresos
- Suma mensual de gastos

La información se genera dinámicamente en función de los meses registrados tanto en ingresos como en gastos.

---

## Proceso de instalación

1. Clonar el repositorio
```bash
git clone https://github.com/FerFerFer35/PruebaTecnicaLaravel.git
```

2. Acceder al directorio del proyecto
```bash
cd PruebaTecnicaLaravel
```

3. Instalar dependencias de PHP
```bash
composer install
```

4. Instalar dependencias de Node
```bash
npm install
```

5. Crear el archivo de entorno
```bash
cp .env.example .env
```

6. Generar la clave de la aplicación
```bash
php artisan key:generate
```

7. Ejecutar migraciones  
(Crea las tablas sin datos de prueba)
> **Nota sobre la base de datos (SQLite)**
>
> Este proyecto utiliza **SQLite** como motor de base de datos.
>
> El archivo de base de datos se encuentra (o debe encontrarse) en la siguiente ruta:
>
> ```text
> database/database.sqlite
> ```
>
> El repositorio ya incluye este archivo para facilitar la ejecución inicial.  
> Sin embargo, si por algún motivo el archivo no existe o el sistema no lo reconoce, puede crearse manualmente.
```bash
php artisan migrate
```

8. Compilar los assets de frontend
```bash
npm run dev
```

9. Levantar el servidor de desarrollo
```bash
php artisan serve
```

10. Reiniciar la base de datos e insertar datos de prueba
```bash
php artisan migrate:fresh --seed
```


La aplicación estará disponible en:

```text
http://127.0.0.1:8000
```

---

## 📝 Notas finales

- El proyecto sigue una arquitectura MVC utilizando Laravel.
- Se implementaron validaciones tanto en frontend como en backend.
- Las tablas de ingresos y gastos se muestran ordenadas por fecha.
- La gráfica de utilidades muestra la suma mensual de ingresos y gastos.

