import React from 'react';
import {
  StyleSheet,
  Text,
  TouchableOpacity,
  Dimensions,
  View,
} from 'react-native';

const ButtonsMediumSquare = (props) => {
  if (props.menuItem.empty) {
    return (
      <View
        style={[
          styles.ButtonsMediumSquareButton,
          styles.ButtonsMediumSquareButtonEmpty,
        ]}
      />
    );
  } else {
    return (
      <TouchableOpacity
        style={[
          styles.ButtonsMediumSquareButton,
          styles.ButtonsMediumSquareButtonFull,
          { backgroundColor: props.menuItem.styles.backgroundColor },
        ]}
        onPress={() =>
          props.navigationMain.navigate(props.menuItem.navigationTarget)
        }
      >
        <Text style={[styles.ButtonsMediumSquareButtonFullText]}>
          {props.menuItem.title}
        </Text>
      </TouchableOpacity>
    );
  }
};

const styles = StyleSheet.create({
  ButtonsMediumSquareButton: {
    borderRadius: 15,
    alignItems: 'center',
    justifyContent: 'center',
    height: Dimensions.get('window').width / 2,
    flex: 1,
    marginHorizontal: 10,
    marginVertical: 20,
  },
  ButtonsMediumSquareButtonFull: {
    borderWidth: 2,
    borderColor: 'rgba(1, 1, 1, 1)',
  },
  ButtonsMediumSquareButtonFullText: {
    fontSize: 24,
    fontWeight: 'bold',
  },
  ButtonsMediumSquareButtonEmpty: {
    backgroundColor: 'transparent',
    borderColor: 'transparent',
    borderWidth: 0,
  },
});

export default ButtonsMediumSquare;
