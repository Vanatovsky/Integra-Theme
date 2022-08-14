import { TWEEN } from 'three/examples/jsm/libs/tween.module.min'


export function setActiveButtonByID(id) {
    const all_btns = document.querySelectorAll('#bottom_buttons_whale .btn-bot')
    for (const btn of all_btns) {
        btn.classList.remove('active')
    }
    document.querySelector('#' + id).classList.add('active')
}


export function TW(target, to, ms, easing = TWEEN.Easing.Linear.None, onComplete = () => {}, delay = 0) {

    if (Number.isInteger(easing)) {
        delay = easing
        easing = TWEEN.Easing.Linear.None
    }

    if (Number.isInteger(onComplete)) {
        delay = onComplete
        onComplete = () => {}
    }

    return new TWEEN.Tween(target)
        .delay(delay)
        .to(to, ms)
        .easing(easing)
        .start()
        .onComplete(onComplete)
}

export function createRGBString16(a, b, c) {

    return "#" + createOneRgbStr(a) + createOneRgbStr(b) + createOneRgbStr(c)

    function createOneRgbStr(num) {
        if (num <= 10) {
            return "0" + num.toString(16)
        } else {
            return num.toString(16)
        }
    }

}


export function goToInitNumber(num, target, coeficent) {

    if (num > target) {
        num = num - 1 * coeficent
        if (num < target) {
            num = target
        }
        return num
    }

    if (num < target) {
        num = num + 1 * coeficent
        if (num > target) {
            num = target
        }
        return num
    }

    return false
}