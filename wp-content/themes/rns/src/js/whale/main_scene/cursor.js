import * as THREE from 'three'
import { cursor_level_1_material } from './../inc/materials'



export function createPointCursor(gui, settings, pointCursorGroup, level_2_group) {

    // Geometry
    //const point_cursor_geometry = new THREE.CapsuleGeometry( 0.05, 0.05, 4, 8 );
    const point_cursor_geometry = new THREE.SphereBufferGeometry(0.1, 24, 24)
    const point_cursor_material = cursor_level_1_material
    const point_cursor_mesh = new THREE.Mesh(point_cursor_geometry, point_cursor_material)
    point_cursor_mesh.layers.enable(settings.layer_bloom_scene)

    // Point Light
    const pointCursorLight = new THREE.PointLight(settings.cursor_light_color, 2.5, 2)
    pointCursorLight.position.set(-1, 0, .2, 4)
    pointCursorGroup.add(pointCursorLight)
    pointCursorGroup.add(point_cursor_mesh)

    const pointColorDebFolder = gui.addFolder("Color Light Cursor")
    pointColorDebFolder.addColor(settings, "cursor_light_color").onChange(() => {
        pointCursorLight.color.set(settings.cursor_light_color)
    })

    pointCursorGroup.position.y = 8.5
    pointCursorGroup.position.z = -4
    pointCursorGroup.scale.set(12, 12, 12)

    setTimeout(() => { pointCursorGroup.scale.set(1, 1, 1) }, 4500)

    level_2_group.add(pointCursorGroup)

    const debugCursor = gui.addFolder("Cursor")
    debugCursor.addColor(settings, 'color_material_whale_level_3')
        .onChange(function() {
            point_cursor_mesh.material.color.set(settings.color_material_whale_level_3)
        })
}



export function modeCursorLevel1(elapsedTime, camera, pointCursorGroup) {

    pointCursorGroup.position.y = camera.position.y * 1.3
    pointCursorGroup.position.x = Math.sin(elapsedTime * 4) * 2.3 - 7
    pointCursorGroup.position.z = -Math.cos(elapsedTime * 4) * 2.3 - 8

}