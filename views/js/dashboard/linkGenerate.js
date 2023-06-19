export function LinkGenerate(rusField, enField) {
    let inputRu = document.querySelector(rusField)
    let inputEn = document.querySelector(enField)


    if (inputRu && inputEn) {
        inputRu.addEventListener('keyup', function () {

            let letter = {
                'a': 'а',
                'b': 'б',
                'v': 'в',
                'g': 'г',
                'd': 'д',
                'e': 'е',
                'zh': 'ж',
                'z': 'з',
                'iy': 'ы',
                'i': 'и',
                'k': 'к',
                'l': 'л',
                'm': 'м',
                'n': 'н',
                'o': 'о',
                'p': 'п',
                'r': 'р',
                's': 'с',
                't': 'т',
                'u': 'у',
                'f': 'ф',
                'h': 'х',
                'ts': 'ц',
                'tsh': 'ч',
                'sh': 'ш',
                'shch': 'щ',
                'y': 'ь',
                'yy': 'ъ',
                '_': ' ',
            }

            let wordArr = this.value.split('')
            wordArr.forEach((val, key) => {
                for (const eng in letter) {
                    if (val === letter[eng]) {
                        wordArr[key] = eng
                    }
                }
            })

            inputEn.value = wordArr.join('')
        })
    }


}
