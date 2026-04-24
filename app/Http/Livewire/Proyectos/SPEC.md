# SPEC.md - Módulo Standalone Project Manager

## Objetivo
Crear un módulo Laravel/Livewire standalone que Enzo pueda integrar fácilmente a su app existente.

## Requisitos Funcionales

### 1. Panel Principal (Dashboard)
- Lista de todos los proyectos con tarjetas
- Información por proyecto: nombre, descripción, estado (activo/pausado/completado), prioridad, última actividad
- Filtros por estado y prioridad
- Búsqueda por nombre

### 2. Gestión de Proyectos
- CRUD completo de proyectos
- Campos: nombre, descripción, estado, prioridad (baja/media/alta/urgente), color标签, fecha inicio, fecha objetivo
- Soft deletes

### 3. Tareas por Proyecto
- Lista de tareas vinculadas a cada proyecto
- Campos: título, descripción, estado (pendiente/en progreso/completada), prioridad, fecha límite
- Orden arrastrable

### 4. Tracker de Tiempo
- Timer inicio/parada por proyecto
- Historial de sesiones de trabajo
- Total de tiempo por proyecto

### 5. Widget "Focus Mode"
- Muestra solo el proyecto activo actual
- Timer visible
- quick-add tarea

## Stack Técnico
- Laravel 10+
- Livewire 3
- MySQL
- Tailwind CSS (asumiendo que ya lo usás)

## Diseño Visual
- theme oscuro similar a Laravel Forge/Envoyer
- tarjetas con bordes sutiles y hover states
- badges de estado con colores:
  - activo: green
  - pausado: yellow
  - completado: gray
- prioridades: low (gray), media (blue), alta (orange), urgente (red)

## Mockup Requerido
Antes de escribir código, generar un mockup HTML/CSS visual que muestre:
- Vista dashboard con 4-5 proyectos de ejemplo
- Diseño de tarjeta de proyecto
- Sidebar de navegación
- Include the Focus Mode widget

## Entregables
1. Mockup visual (HTML/CSS standalone)
2. Migration para proyectos, tareas, time_entries
3. Livewire components (Dashboard, ProjectCrud, TaskList, TimeTracker, FocusWidget)
4. Routes + configuración
5. Instrucciones de integración