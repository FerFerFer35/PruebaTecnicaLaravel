# 📊 Prueba Técnica Laravel – Gestión de Ingresos y Gastos

Este proyecto es una aplicación desarrollada con **Laravel** que permite la gestión de **proveedores**, **ingresos**, **gastos** y la visualización de **utilidades** y **gráficas mensuales** comparativas.

---

## 🧰 Requisitos previos

Antes de instalar y ejecutar la aplicación, es necesario contar con las siguientes versiones (con las que fue desarrollado el proyecto):

- **PHP:** 8.3.28  
- **Composer:** 2.8.12  
- **Node.js:** 24.13.0  
- **NPM:** 11.7.0  

> ⚠️ **Nota:** NPM no es estrictamente necesario para la ejecución básica del proyecto, pero se incluye para la gestión de dependencias frontend en caso de ser requerido.

---

## 🐳 Dockerización

Con base en estas versiones, la aplicación se encuentra **dockerizada**, lo que permite levantar el entorno de forma sencilla y consistente sin depender de la configuración local del sistema.

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

## ⚙️ Proceso de instalación

### 1️⃣ Clonar el repositorio

```bash
git clone
```

### 2️⃣ Acceder al directorio del proyecto

```bash
cd nombre-del-proyecto
```

### 3️⃣ Instalar dependencias del backend

```bash
composer install
```

### 4️⃣ Instalar dependencias del frontend

```bash
npm install
```

### 5️⃣ Configurar variables de entorno

Copiar el archivo de entorno y generar la clave de la aplicación:

```bash
cp .env.example .env
php artisan key:generate
```

---

## 🗄️ Migración y siembra de la base de datos

Ejecutar las migraciones junto con los seeders:

```bash
php artisan migrate --seed
```

Esto creará las tablas necesarias y cargará datos de prueba para ingresos, gastos y proveedores.

---

## 🐳 Ejecución con Docker

Levantar los contenedores del proyecto:

```bash
docker compose up -d
```

---

## 🚀 Ejecución sin Docker

En caso de no usar Docker, iniciar el servidor de desarrollo:

```bash
php artisan serve
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

